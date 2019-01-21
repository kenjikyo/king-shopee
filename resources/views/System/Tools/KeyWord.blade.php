@extends('System.Layouts.Master')
@section('title')
   KeyWord - Shopee 
@endsection
@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark">Key Word</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#"><span>table</span></a></li>
        <li class="active"><span>Export</span></li>
      </ol>
    </div>
    <!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <div id="datable_1_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="datable_1_length"><label>Show <select name="datable_1_length" aria-controls="datable_1" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="datable_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="datable_1"></label></div><table id="datable_1" class="table table-hover display  pb-30 dataTable" role="grid" aria-describedby="datable_1_info">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Key Word</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque illum eius ex optio nemo accusantium illo architecto, expedita fugiat tempore quae obcaecati iusto officiis sint dignissimos voluptates iste facere quo?</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author Lorem ipsum dolor sit amet, consectetur adipisicing elit. In porro itaque modi voluptas quas aut nostrum et dolorem, omnis atque ipsa corrupti, velit fuga doloribus ex neque, repellat asperiores excepturi recusandae. Harum laborum veritatis nihil aliquam officiis, blanditiis asperiores, fugit sequi cum placeat labore quis sit! Maxime fugit nisi laudantium?</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- /Row -->
@endsection
@section('script')
    
@endsection