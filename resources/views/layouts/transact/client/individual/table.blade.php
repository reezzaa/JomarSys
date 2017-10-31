<table id="indivclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">ID</th>
      <th class="text-center">First Name</th>
      <th class="text-center">Contact #</th>
      <th class="text-center">TIN</th>
      <th class="text-center">Address</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($clients as $client)
    <tr id="{{$client->strIndClientID}}">
        <td class="text-center">
           <a href="quote"><button class="btn btn-alt btn-sm btn-primary"><span class="hi hi-plus"> </span> Quote</button></a>
        </td>
        <td class="text-center">
             {{ $client->strIndClientID }}
        </td>
        <td class="text-center">
            {{ $client->strIndClientFName }} {{ $client->strIndClientMName }} {{ $client->strIndClientLName }}
        </td>
        <td class="text-center">
             {{ $client->strIndClientContactNo }}
        </td>
         <td class="text-center">
             {{ $client->strIndClientTIN }}
        </td>
        <td class="text-center">
             {{ $client->strIndClientAddress }} {{ $client->strIndClientCity }}, {{ $client->strIndClientProv }}
        </td>
        <td>
          <div class="text-center form-inline">
            <button class="btn btn-alt btn-warning"  data-toggle="tooltip" data-placement="top" data-original-title="Edit" value="{{$client->strIndClientID}}"> <span class="gi gi-pencil"></span></button>
            {{ Form::open(array('url'=>'newindclient/'.$client->strIndClientID)) }}
              {{ Form::hidden('_method','DELETE') }}
              <button type="submit" class="btn btn-alt btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><span class="gi gi-bin"></span></button>
            {{ Form::close() }}
          </div>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>