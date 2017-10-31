<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Quote #</th>
      <th class="text-center">Client ID</th>
      <th class="text-center">Quote Name</th>
      <th class="text-center">Date Quoted</th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($quote as $quoteMat)
    <tr>
        <td class="text-center">
            {{ $quoteMat->strQuoteID }}
        </td>
        <td class="text-center">
            {{ $quoteMat->strClientID }}
        </td>
        <td class="text-center">
            {{ $quoteMat->strQuoteName }}
        </td>
        <td class="text-center">
            {{ $quoteMat->datQuoteDate }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>