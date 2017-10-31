
 <table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
      <thead>
      <tr>
      <th class="text-center">Material</th>
      <th class="text-center">Date</th>
      <th class="text-center">Status</th>
      <th class="text-center">Quantity</th></tr>
      </thead>
      <tbody id="">
          @foreach($imat as $imat)
    <tr>
      <td class="text-center">
        {{$imat->strMaterialName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($imat->dtmStockDate)->toDayDateTimeString()}}
      </td>
      <td class="text-center">
        {{$imat->strStockMethod}}
      </td>
      <td class="text-center">
        {{$imat->intStock}}
      </td>
    </tr>
    @endforeach     
      </tbody>
   
<script>$(function(){ TablesDatatables.init(); });</script>
