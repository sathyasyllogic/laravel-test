@extends('layouts.default')
@section('content')

	<h2>Laboratory and Accreditation Information</h2>
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		<li class="active">
			<a href="#labinformation" data-toggle="tab">
				Lab
			</a>
		</li>
		<li>
			<a href="#physicaladdressinformation" data-toggle="tab">
				Physical Address
			</a>
		</li>
		<li>
			<a href="#postaladdress" data-toggle="tab">
				Postal Address
			</a>
		</li>
		<li>
			<a href="#billingaddress" data-toggle="tab">
				Billing Address
			</a>
		</li>
    </ul>
	<div id="my-tab-content" class="tab-content">
		<div class="tab-pane active" id="labinformation">
			<h1>Lab Information</h1>
			@include('includes.templates.labinformation.lab')
		</div>
		<div class="tab-pane" id="physicaladdressinformation">
			<h1>Physical Address Information</h1>
			@include('includes.templates.labinformation.physical')
		</div>
		<div class="tab-pane" id="postaladdress">
			<h1>Postal Address Information</h1>
			@include('includes.templates.labinformation.postal')
		</div>
		<div class="tab-pane" id="billingaddress">
			<h1>Billing Address Information</h1>
			@include('includes.templates.labinformation.billing')
		</div>
	</div> 

	<script type="text/javascript">
		jQuery(document).ready(function ($) {
		$('#myTab').tab();
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
