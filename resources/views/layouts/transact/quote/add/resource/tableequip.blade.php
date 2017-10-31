<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Equipment Name</th>
      <th class="text-center">Rental Price</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Unit Cost </th>
    </tr>
  </thead>
  <tbody id="client-list">
   @foreach($quoteEquip as $quoteEquip)
    <tr>
        <td class="text-center">
            {{ $quoteEquip->strEquipName }}
        </td>
        <td class="text-center">
            {{ $quoteEquip->dcmUnitPrice }}
        </td>
        <td class="text-center">
            {{ $quoteEquip->intQty }}
        </td>
        <td class="text-center">
            {{ $quoteEquip->dcmUnitCost }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>