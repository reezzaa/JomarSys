         <div class="block">
            <!-- Horizontal Form Content -->
            @forelse($employeeID as $employeeID)
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Employee No.
                  </td>
                  <td class="text-center">
                      {{ $employeeID->strEmpIDUtil }}
                  </td>
                </tr>
              </tbody>
            </table>
            @empty
              {!! Form::open(['action'=>'O\UtilitiesController@storeEmpID', 'id'=>'save-empNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']) !!}
                  <div class="form-group">
                      {!! Form::label('strEmpIDUtil','Employee No.',array('class'=>'col-md-3 control-label')) !!}
                      <div class="col-md-5">
                          {!! Form::text('strEmpIDUtil',null, array('class'=>'form-control','placeholder'=>'Employee No.')) !!}
                      </div>
                      <div class="col-md-4">
                          <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                          <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                      </div>
                  </div>
              {!! Form::close() !!}
            @endforelse

            @forelse($clientID as $clientID)
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Client No.
                  </td>
                  <td class="text-center">
                      {{ $clientID->strClientIDUtil }}
                  </td>
                </tr>
              </tbody>
            </table>
            @empty
                {!! Form::open(['action'=>'O\UtilitiesController@storeClientID', 'id'=>'save-clientNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('strClientIDUtil','Client No.',array('class'=>'col-md-3 control-label')) !!}
                        <div class="col-md-5">
                            {!! Form::text('strClientIDUtil',null, array('class'=>'form-control','placeholder'=>'Client No.')) !!}
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                {!! Form::close() !!}
            @endforelse   

          
            <!-- END Horizontal Form Content -->
        </div>