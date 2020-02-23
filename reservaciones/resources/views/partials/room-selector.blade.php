    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-12">
    				<form method="post" action="{{ route('room.choose') }}" class="booking-form aside-stretch">
							@csrf
	        		<div class="row">
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
				    					<label for="check_in">Fecha de ingreso</label>
											<input type="text" name="check_in" id="check_in" class="form-control checkin_date @error('check_in') is-invalid @enderror" placeholder="ingreso" value="{{ old('check_in') }}">
											@error('check_in')
												<p style="color: #d00000;">{{ $message }}</p>
											@enderror
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
				    					<label for="check_out">Fecha de egreso</label>
				    					<input type="text" name="check_out" id="check_out" class="form-control checkout_date @error('check_out') is-invalid @enderror" placeholder="egreso" value="{{ old('check_out') }}">
											@error('check_out')
												<p style="color: #d00000;">{{ $message }}</p>
											@enderror
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
			      					<label for="room_type_id">Habitación</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="room_type_id" id="room_type_id" class="form-control">
                            @foreach ($roomTypes as $roomType)
                              <option value="{{ $roomType->id }}" {{ $roomType->id == old('room_type_id') ? 'selected' : '' }}>{{ $roomType->name }}</option>
                            @endforeach
			                    </select>
													@error('room_type_id')
														<p style="color: #d00000;">{{ $message }}</p>
													@enderror
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
			      					<label for="passengers">Pasajeros</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="passengers" id="passengers" class="form-control">
			                    	<option value="1" {{ old('passengers') == 1 ? 'selected' : '' }}>1 Pasajero</option>
			                      <option value="2" {{ old('passengers') == 2 ? 'selected' : '' }}>2 Pasajeros</option>
			                      <option value="3" {{ old('passengers') == 3 ? 'selected' : '' }}>3 Pasajeros</option>
			                      <option value="4" {{ old('passengers') == 4 ? 'selected' : '' }}>4 Pasajeros</option>
			                      <option value="5" {{ old('passengers') == 5 ? 'selected' : '' }}>5 Pasajeros</option>
			                      <option value="6" {{ old('passengers') == 6 ? 'selected' : '' }}>6 Pasajeros</option>
			                    </select>
													@error('passengers')
														<p style="color: #d00000;">{{ $message }}</p>
													@enderror
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <button class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block" type="submit">
											<span>
												Consultar disponibilidad <small>El mejor precio garantizado!</small>
											</span>
										</button>
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
    </section>
