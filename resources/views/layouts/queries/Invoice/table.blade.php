<table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Invoice No</th>
      <th class="text-center">Amount</th>
      <th class="text-center">Due Date</th>
      <th class="text-center">Date of Payment</th> 
      <th class="text-center">OR No.</th> 
      <th class="text-center">Status</th> 
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($inv as $inv1)
    <tr>
    <td class="text-center">
        {{$inv1->strServInvHID}}
      </td>
      <td class="text-center">
        ₱ {{$inv1->dblServInvDCost}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($inv1->datDueDate)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($inv1->datPaymentDateIssued)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$inv1->strORNumber}}
      </td>
      <td class="text-center">
         @if($inv1->status==1)
         <label class="label label-success"> Paid</label>
         @elseif($inv1->status==0)
         <label class="label label-danger"> Unpaid</label>
         @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>