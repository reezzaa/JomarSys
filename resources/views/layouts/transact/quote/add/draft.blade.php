@forelse($draftQuotes as $draftQuotes)
	<a href="/quotedetail/{{$draftQuotes->strQuoteID}}" class="widget widget-hover-effect1">
	    <div class="widget-simple">
	        <h4 class="widget-content">
	            <strong>{{ $draftQuotes->strQuoteID }}</strong>
	            <small>Quote Name: {{ $draftQuotes->strQuoteName }}</small>
	            <small>Date created: {{ $draftQuotes->datQuoteDate }}</small>
	        </h4>
	    </div>
	</a>
@empty
 	<a href="javascript:void(0)" class="widget widget-hover-effect1">
	    <div class="widget-simple">
	        <h4 class="widget-content">
	            <small>No currently saved Quotation</small>
	        </h4>
	    </div>
	</a>
@endforelse