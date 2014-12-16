@extends('layouts.default')
@section('content')

	<h2>List of BIKA Health Users</h2>
	
	<div class="table-responsive">
	<table id="dg" title="BIKA Health Users" 
	class="easyui-datagrid col-md-9 table-bordered table-striped table-condensed cf" style="width:900px;height:400px"
			url="usersview"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead class="cf">
			<tr>
				<th field="first_name" width="50">First Name</th>
				<th field="last_name" width="50">Last Name</th>
				<th field="username" width="50">User Name</th>
				<th field="email" width="50">Email</th>
				<th field="Department" width="50">Department</th>
				<th field="Groups" width="50">Groups</th>
			</tr>
		</thead>
	</table>
	
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
	</div>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>First Name:</label>
				<input name="first_name" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Last Name:</label>
				<input name="last_name" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>User Name:</label>
				<input name="username" class="easyui-textbox">
			</div>
			
			<div class="fitem">
				<label>Email:</label>
				<input name="email" class="easyui-textbox" validType="email">
			</div>
			
			<div class="fitem">
				<label>Department:</label>
				<input name="Department" class="easyui-textbox" required="true" >
			</div>
			<div class="fitem">
				<label>Groups:</label>
				<input name="Groups" class="easyui-textbox" required="true">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>
	<table class="table table-striped table bordered table hover" id="dataTables-example">
		<thead>
			<tr>
				<th>Column1</th>
				<th>Column2</th>
				<th>Column3</th>
				<th>Column4</th>
				<th>Column5</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
				<td>sathya</td>
				<td>34</td>
				<td>sathya@syllogic.in</td>
				<td>MCA</td>
				<td>Senior Web Developer</td>
			</tr>
			<tr>
				<td>Hari raj</td>
				<td>25</td>
				<td>hari@syllogic.in</td>
				<td>BE(EC)</td>
				<td>Web Designer</td>
			</tr>
		</tbody>
	</table>
	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'http://localhost/laravel/public/create_user';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'http://localhost/laravel/public/update_user/'+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('http://localhost/laravel/public/destroy_user',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
		function pagerFilter(data){
			if (typeof data.length == 'number' && typeof data.splice == 'function'){	// is array
				data = {
					total: data.length,
					rows: data
				}
			}
			var dg = $(this);
			var opts = dg.datagrid('options');
			var pager = dg.datagrid('getPager');
			pager.pagination({
				onSelectPage:function(pageNum, pageSize){
					opts.pageNumber = pageNum;
					opts.pageSize = pageSize;
					pager.pagination('refresh',{
						pageNumber:pageNum,
						pageSize:pageSize
					});
					dg.datagrid('loadData',data);
				}
			});
			if (!data.originalRows){
				data.originalRows = (data.rows);
			}
			var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
			var end = start + parseInt(opts.pageSize);
			data.rows = (data.originalRows.slice(start, end));
			return data;
		}
		
		$(function(){
			$('#dg').datagrid({loadFilter:pagerFilter});
		});
		
	 
	</script>
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
		
	</style>

@stop
