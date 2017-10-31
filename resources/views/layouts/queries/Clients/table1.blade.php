<table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Logo</th>
      <th class="text-center">Company Name</th>
      <th class="text-center">Client's Representative</th>
      <th class="text-center">Location</th>
      <th class="text-center">TIN</th>
      <th class="text-center">Contact No.</th>
      <th class="text-center">Email</th>

    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($clients as $client)
    <tr id="strCompClientID">
        <td class="text-center">
            {{ $client->strCompClientID }}
        </td>
        <td class="text-center">
            <img src="{{url('images', $client->strCompClientImage)}}" style="width:80px;">
        </td>
        <td class="text-center">
            {{ $client->strCompClientName }}
        </td>
        <td class="text-center">
            {{ $client->strCompClientRepresentative }}<br>
            <i>{{ $client->strCompClientPosition }}</i>
        </td>
        <td class="text-center">
             {{ $client->strCompClientCity }},  {{ $client->strCompClientProv }}
        </td>
        <td class="text-center">
            {{ $client->strCompClientTIN }}
        </td>
        <td class="text-center">
            {{ $client->strCompClientContactNo }}
        </td>
        <td class="text-center">
            {{ $client->strCompClientEmail }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>