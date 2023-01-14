@extends('layouts.layout')


@section('content')
    <div class="page-wrapper">
        <div>	
        	<br><br><h3>Образовательные стандарты и требования</h3>
				<table class="table"><caption></caption>

	                <div class="container-fluid">
	                	<div class="row" itemprop="eduFedDoc">
							<p>{!! preg_replace( "#\r?\n#", "<br>", $eduStandart->text ) !!}</p>
	                    </div>
	                	<div class="row" itemprop="eduStandartDoc">
							<p><b>{!! preg_replace( "#\r?\n#", "<br>", $eduStandart->link_requirements ) !!}</b></p>
	                    </div>
	                </div>
				</table>
        </div>
    </div>

	    <hr class="invis">


@endsection
