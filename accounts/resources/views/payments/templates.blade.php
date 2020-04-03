      {{-- Renglón para efectivo --}}
      <template id="cash-row-template">
         <div class="form-row mt-2">
            <div class="col-2">
               <div class="row">
                  <div class="col-3 pr-0 inv-row-buttons">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="item_num" value="##" tabindex="-1">
                     <i class="fas fa-trash-alt inv-item-delete"></i>
                  </div>
                  <div class="col-9 pl-0">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="method_code" tabindex="-1">
                  </div>
               </div>
            </div>

            <input type="hidden" id="payment_method_id" name="payment_method[id]">
            <input type="hidden" id="payment_method_type_code" value="cash">
            
            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.amount') is-invalid @enderror" id="item_amount" name="item[amount]" value="0">
               @error('item.amount')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.comment') is-invalid @enderror" id="item_comment" name="item[comment]">
               @error('item.comment')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
         </div>
      </template>

      {{-- Renglón para cheque --}}
      <template id="check-row-template">
         <div class="form-row mt-2">
            <div class="col-2">
               <div class="row">
                  <div class="col-3 pr-0 inv-row-buttons">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="item_num" value="##" tabindex="-1">
                     <i class="fas fa-trash-alt inv-item-delete"></i>
                  </div>
                  <div class="col-9 pl-0">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="method_code" tabindex="-1">
                  </div>
               </div>
            </div>

            <input type="hidden" id="payment_method_id" name="payment_method[id]">
            <input type="hidden" id="payment_method_type_code" value="check">
            
            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.amount') is-invalid @enderror" id="item_amount" name="item[amount]" value="0">
               @error('item.amount')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.comment') is-invalid @enderror" id="item_comment" name="item[comment]">
               @error('item.comment')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <select class="custom-select custom-select-lg font-weight-bold @error('item.bank_id') is-invalid @enderror" id="item_bank_id" name="item[bank_id]">
                  @foreach ($banks as $bank)
                     <option value="{{ $bank->id }}" {{ old('item.bank_id') == $bank->id ? 'selected' : '' }}>
                        {{ $bank->name }}
                     </option>
                  @endforeach
               </select>
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.number') is-invalid @enderror" id="item_number" name="item[number]">
               @error('item.number')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="date" class="form-control form-control-lg font-weight-bold @error('item.due_date') is-invalid @enderror" id="item_due_date" name="item[due_date]">
               @error('item.due_date')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
         </div>
      </template>

      {{-- Renglón para transferencia --}}
      <template id="deposit-row-template">
         <div class="form-row mt-2">
            <div class="col-2">
               <div class="row">
                  <div class="col-3 pr-0 inv-row-buttons">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="item_num" value="##" tabindex="-1">
                     <i class="fas fa-trash-alt inv-item-delete"></i>
                  </div>
                  <div class="col-9 pl-0">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" id="method_code" tabindex="-1">
                  </div>
               </div>
            </div>

            <input type="hidden" id="payment_method_id" name="payment_method[id]">
            <input type="hidden" id="payment_method_type_code" value="deposit">
            
            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.amount') is-invalid @enderror" id="item_amount" name="item[amount]" value="0">
               @error('item.amount')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.comment') is-invalid @enderror" id="item_comment" name="item[comment]">
               @error('item.comment')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <select class="custom-select custom-select-lg font-weight-bold @error('item.account_id') is-invalid @enderror" id="item_account_id" name="item[account_id]">
                  @foreach ($bank_accounts as $account)
                     <option value="{{ $account->id }}" {{ old('item.account_id') == $account->id ? 'selected' : '' }}>
                        {{ $account->name }}
                     </option>
                  @endforeach
               </select>
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.number') is-invalid @enderror" id="item_number" name="item[number]">
               @error('item.number')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="date" class="form-control form-control-lg font-weight-bold @error('item.due_date') is-invalid @enderror" id="item_due_date" name="item[due_date]">
               @error('item.due_date')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
         </div>
      </template>
