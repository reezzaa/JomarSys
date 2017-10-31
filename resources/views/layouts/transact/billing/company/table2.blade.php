<table id="4col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
				  <thead>
				      <tr>
				      	  <th class="text-center">Contract No.</th>
					      <th class="text-center">Client Name</th>
					      <th class="text-center">Project Name</th>
					      <th class="text-center">Controls</th>
				    </tr>
				  </thead>
				  <tbody id="client-list">
				   <!--  -->
				   @foreach($getcollect as $inv)
				   <tr>
				        <td class="text-center">
				            {{ $inv->strContractID }}
				        </td>
				        <td class="text-center">
				            {{ $inv->strCompClientName }}
				        </td>
				        <td class="text-center">
				            {{ $inv->strQuoteName }}
				        </td>
				      	<td class="text-center">
				        	<a href="billing/collect/{{$inv->strContractID}}"><button class="btn btn-alt btn-info" id="viewinvoice" value="{{$inv->strContractID}}" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span></button></a>
				      	</td>

				       
				      </tr>
				   @endforeach
				  </tbody>
				</table>
<script>$(function(){ TablesDatatables.init(); });</script>
           
				