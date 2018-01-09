<table id="billbycontract-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th style="width: 100px"></th>
      <th class="text-center">Contract</th>
      <th class="text-center">Client</th>
      <th class="text-center">Amount</th>
    </tr>
  </thead>
<tbody>
  <tr>
    <td class="text-center">
           <a href=" {{ route('billingcollection.create')}}"><button class="btn btn-alt btn-sm btn-primary"><span class="gi gi-new_window"> </span> Show</button></a>
        </td>
    <td class="text-center">CO111111</td>
    <td class="text-center">Sample</td>
    <td class="text-center">8929787382</td>
    
  </tr>
</tbody>
</table>   
<br>     
<script>$(function(){ TablesDatatables.init(); });</script>
