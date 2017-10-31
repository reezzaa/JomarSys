<table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">Contact #</th>
      <th class="text-center">Location</th>
      <th class="text-center">TIN</th>

    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($locat2 as $iclient)
    <tr id="intIndClientID">
        <td class="text-center">
            {{ $iclient->strIndClientID }}
        </td>
        <td class="text-center">
            {{ $iclient->strIndClientFName }} {{ $iclient->strIndClientMName }} {{ $iclient->strIndClientLName }}
        </td>
        <td class="text-center">
             {{ $iclient->strIndClientContactNo }}
        </td>
        <td class="text-center">
             {{ $iclient->strIndClientCity }},  {{ $iclient->strIndClientProv }}
        </td>
        <td class="text-center">
            {{ $iclient->strIndClientTIN }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
