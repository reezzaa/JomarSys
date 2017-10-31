<table id="client-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">Logo</th>
      <th class="text-center">Company Name</th>
      <th class="text-center">Client's Representative</th>
      <th class="text-center">Location</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($clients as $client)
    <tr>
        <td class="text-center">
           <a href="quote/{{$client->intClientID}}"><button class="btn btn-alt btn-sm btn-primary"><span class="hi hi-plus"> </span> Quote</button></a>
        </td>
        <td class="text-center">
            <img src="{{url('images', $client->strClientImage)}}" style="width:80px;">
        </td>
        <td class="text-center">
            {{ $client->strClientName }}
        </td>
        <td class="text-center">
            {{ $client->strClientContactPerson }}<br>
            <i>{{ $client->strClientPosition }}</i>
        </td>
        <td class="text-center">
             {{ $client->strClientCity }},  {{ $client->strClientProv }}
        </td>
        <td>
          <div class="text-center">
            <a href="client/{{$client->intClientID}}"><button class="btn btn-alt btn-info"><span class="gi gi-eye_open"></span></button></a>
            <a href="client/{{$client->intClientID}}/edit"><button class="btn btn-alt btn-warning"> <span class="gi gi-pencil"></span></button></a>
            <button class="btn btn-alt btn-danger"><span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>