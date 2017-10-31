<table id="indbill-datatable" class="table table-vcenter table-striped table-bordered table-hover">
				  <thead>
				      <tr>
				      	  <th></th>
				      	  <th class="text-center">Quote No.</th>
					      <th class="text-center">Client Name</th>
					      <th class="text-center">Quote Name</th>
					      <th class="text-center">Status</th>
				    </tr>
				  </thead>
				  <tbody id="client-list">
				   <!--  -->
				   @foreach($inv as $inv)
				   <tr>
				   		<td class="text-center">
				           <a href="javascript:void(0)"><button class="btn btn-alt btn-md btn-primary" id="show" value="{{ $inv->strQuoteID }}"><span  class="fa fa-tag"> </span> Open</button></a>
				        </td>
				        <td class="text-center">
				            {{ $inv->strQuoteID }}
				        </td>
				        <td class="text-center">
				            {{ $inv->strIndClientFName }} {{ $inv->strIndClientMName }} {{ $inv->strIndClientLName }}
				        </td>
				        <td class="text-center">
				            {{ $inv->strQuoteName }}
				        </td>
				         <td class="text-center">
				        @if(($inv->constatus)==1)
				        	<label class="label label-warning"> Pending</label>
				        @elseif(($inv->constatus)==2)
				        	<label class="label label-primary"> Paid</label>
				        @endif
				        </td>
				      </tr>
				   @endforeach
				  </tbody>
				</table>
<script>$(function(){ TablesDatatables.init(); });</script>
  <div id="indbill_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditMatModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong><p id="quote"></p></strong></h3>
          </div>
          <div>
           {!! Form::open(['url'=>'individualbilling', 'method'=>'POST','target'=>'_blank', 'id'=>'frm-insert']) !!}
           <h4><strong><p id="client"></p></strong></h4>
           	<input type="hidden" id="quoteid" name="quoteid">
           	<input type="hidden" name="date" id="date">
           	<div class="text-center" id="thisd">
           	</div>
				<div class="form-group">
					<h4><strong><p id="name"></p></strong></h4>
				</div>
				<div class="form-group">
					<h4><strong><p id="amt"></p></strong></h4>
					<input type="hidden" id="amount" name="amount">
				</div>
				<div>
					<input type="hidden" id="term" name="term">
					<input type="hidden" id="desc" name="desc">
				</div>
				<div class="text-center">
					<p id="stat"></p>
				</div>
              <div class="pull-right" id="btns">
                <button id="cancel" type="button"  class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel
                </button>
                <button type="submit" id="sub" class="btn btn-primary"><span class="gi gi-plus"></span> Bill
                </button>
              </div>
              <div class="clearfix"></div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
				