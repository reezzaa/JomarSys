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
     @foreach($invp as $invp)
    <tr>
    <td class="text-center">
        {{$invp->strServInvHID}}
      </td>
      <td class="text-center">
        ₱ {{$invp->dblServInvDCost}}
      </td>
      <td class="text-center">
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($invp->datPaymentDateIssued)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$invp->strORNumber}}
      </td>
      <td class="text-center">
         @if($invp->status==1)
         <label class="label label-success"> Paid</label>
         @endif
      </td>
    </tr>
    @endforeach
    @foreach($invp2 as $invp2)
    <tr>
    <td class="text-center">
        {{$invp2->strServInvHID}}
      </td>
      <td class="text-center">
        ₱ {{$invp2->dblServInvDCost}}
      </td>
      <td class="text-center">
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($invp2->datPaymentDateIssued)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$invp2->strORNumber}}
      </td>
      <td class="text-center">
         @if($invp2->status==1)
         <label class="label label-success"> Paid</label>
         @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>