<table id="clientqueries-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Description</th>
      <th class="text-center">Fee</th>
    </tr>
  </thead>
  <tbody id="service-list">
    @foreach($re as $re)
    <tr>
        <td class="text-center">
          {{ $re->strQAdesc }}
        </td>
        <td class="text-center">
          {{ $re->dblQAamt }}
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

