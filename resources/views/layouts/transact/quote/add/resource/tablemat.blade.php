<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Material Name</th>
      <th class="text-center">Material Price</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Unit Cost</th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($quoteMat as $quoteMat)
    <tr>
        <td class="text-center">
            {{ $quoteMat->strMaterialName }}
        </td>
        <td class="text-center">
            {{ $quoteMat->dcmMaterialUnitPrice }}
        </td>
        <td class="text-center">
            {{ $quoteMat->intQty }}
        </td>
        <td class="text-center">
            {{ $quoteMat->dcmUnitCost }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>