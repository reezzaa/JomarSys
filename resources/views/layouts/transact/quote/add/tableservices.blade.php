<table id="services-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th style="width: 175px;" class="text-center"></th>
      <th class="text-center">Services</th>
      <th class="text-center">Service Cost</th>
    </tr>
  </thead>
  <tbody id="service-list">
    @foreach($qdserve as $services)
    <tr id="{{ $services->intMatNeedID }}">
        <td class="text-center">
          <a href="/newresource/{{$services->intQDID}}">
            <button class="btn btn-alt btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Add Resource">
              <span class="gi gi-plus"></span> Resource
            </button>
          </a>
            
        </td>
        <td class="text-center">
          {{ $services->strServiceOffName }}
        </td>
        <td class="text-center">
          {{ $services->dcmQuoteServiceCost }}
        </td>
      </tr>
      @endforeach
  </tbody>
</table>

