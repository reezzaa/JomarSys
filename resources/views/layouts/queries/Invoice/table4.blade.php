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
     @foreach($invu as $invu)
    <tr>
    <td class="text-center">
        {{$invu->strServInvHID}}
      </td>
      <td class="text-center">
        ₱ {{$invu->dblServInvDCost}}
      </td>
      <td class="text-center">
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($invu->datPaymentDateIssued)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$invu->strORNumber}}
      </td>
      <td class="text-center">
         @if($invu->status==0)
         <label class="label label-danger"> Unpaid</label>
         @endif
      </td>
    </tr>
    @endforeach
    @foreach($invu2 as $invu2)
    <tr>
    <td class="text-center">
        {{$invu2->strServInvHID}}
      </td>
      <td class="text-center">
        ₱ {{$invu2->dblServInvDCost}}
      </td>
      <td class="text-center">
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($invu2->datPaymentDateIssued)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$invu2->strORNumber}}
      </td>
      <td class="text-center">
         @if($invu2->status==0)
         <label class="label label-danger"> Unpaid</label>
         @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>