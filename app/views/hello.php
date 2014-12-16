<!DOCTYPE html>
<html>
<head>


	<meta charset="UTF-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<title>List of BIKA Health Users</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="http://localhost/laravel/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/laravel/assets/css/font-awesome.min.css">
       <link rel="stylesheet" href="http://localhost/laravel/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="http://localhost/laravel/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/laravel/assets/css/style.css">
 
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	
    <!-- Custom styles for our template -->
  
</head>
<body>
	<div class="container">
		<div class="row">
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
		$( window ).load(function() {
			//alert("dfd");
			 // $(".datagrid-btable tr td").attr("data-title","code");
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
	</div>
	</div>
	
</body>
</html>
