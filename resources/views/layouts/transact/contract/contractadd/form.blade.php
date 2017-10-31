{!! Form::open(['url'=>'contractadd', 'id'=>'form-contract', 'class'=>'form-bordered']) !!}
          <br>
            <fieldset class="col-sm-12 ">
            <div class="col-sm-4">
                  <label for="quotation"><em>Filter by: </em> <strong>Client</strong></label>
                  <select id="client" name="client" class="select-chosen" onchange="findByClient(this.value)" data-placeholder="">
                  <option value=""></option>
                    @foreach($client as $service)
                      <option value="{{ $service->strCompClientID }}">{{ $service->strCompClientName }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-sm-8">
                  <div>
                        <label for="quotation">Select Quotation <span class="text-danger">*</span></label> 
                        <div >
                        <select name="quotation" id="quotation" class='form-control' data-placeholder='Choose'>
                      <option value=""></option>
                      @foreach($qoute as $qqoute)
                      <option value="{{ $qqoute->strQuoteID }}">{{ $qqoute->strQuoteName }}
                      </option>
                    @endforeach
                      </select> 
                     </div>
                  </div><br> 
                </div>
            </fieldset>
            <br><hr>
            <fieldset class="form-group "> 
                   <div class="col-sm-12 ">
                   @foreach($downpayment as $d)
                    <input type="hidden" name="down" value="{{$d->intDownID}}" >
                    <input type="hidden" name="downvalue" value="{{$d->intDownValue}}" >

                   @endforeach
                   @foreach($tax as $t)
                    <input type="hidden" name="tax" value="{{$t->intTaxID}}" >
                    <input type="hidden" name="taxvalue" value="{{$t->intTaxValue}}" >

                   @endforeach
                   @foreach($retention as $ret)
                     <input type="hidden" name="ret" value="{{$ret->intRetID}}" >
                     <input type="hidden" name="retvalue" value="{{$ret->intRetValue}}" >

                   @endforeach

                   @foreach($recoupment as $rec)
                      <input type="hidden" name="rec" value="{{$rec->intRecID}}" >
                     <input type="hidden" name="recvalue" value="{{$rec->intRecValue}}" >

                   @endforeach

                      <label for="strFormPayment" class="col-sm-4 text-center">Progress Billing Mode</label>            
                      <div class="col-sm-6 form-inline">
                       <select id="progress" name="progress[]" class="select-chosen" data-placeholder="Choose.." style="width: 250px;" multiple>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>       
                        </select>
                      </div>
                      </div>
                   
            </fieldset>

            <fieldset class="form-group">
              <div class="col-md-offset-9">
                 {!! Form::submit('Save Contract',['id'=>'submit','class'=>'btn btn-alt btn-success']) !!}
                 <!-- {!! Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']) !!} -->
              </div>
            </fieldset>
          {!! Form::close() !!}