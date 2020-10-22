{{-- Office popup ************************************************--}}
<div class="office-filter pay-filter" id="pay_popup{{$member->id}}">
<div></div>
<div class="office-card" id="pay-details{{$member->id}}">
  <div class="mem-top-nav bg-primary">
    <p class="pop-topBar">Payments</p>
    <img src="/images/close.svg" alt="close" onclick="togglePayPopup({{$member->id}})"/>
    {{-- <img src="/images/save.svg" alt="save" onclick="saveMember({{$member->id}})"/> --}}
    {{-- <i class="fas fa-times" onclick="toggleOfficePopup({{$member->id}})"></i> --}}
    {{-- <i class="fas fa-save" onclick="saveMember({{$member->id}})"></i> --}}
    {{-- <i class="fas fa-print" id="ajax-tester"></i> --}}
    <span class="msg-line" id="pay-msg{{$member->id}}"></span>
  </div>

<form class="payments-form" id="pay-form{{$member->id}}" action="/save_pay" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$member->id}}">
    <div class="scroll-container">
      <table>
        <thead>
          <th>Date</th>
          <th>Amount</th>
          <th>Notes</th>
        </thead>
        <tbody class="scroll-t-body">
          @if(count($member->payments)<=0)
            <tr>
              <td>No Payments for this member</td></tr>
          @endif
          @foreach($member->payments as $payment)
            <tr>
              <td id="payDate{{$payment->id}}">{{$payment->pay_date}}</td>
              <td id="payAmount{{$payment->id}}">{{$payment->amount}}</td>
              <td id="payNotes{{$payment->id}}">{{$payment->notes}}</td>
              <td class="pay-buttons-cover">
                <button type="button" class="options-icon" onclick="deletePayToggle({{$payment->id}})"
                  id="tdDelPayBtn{{$payment->id}}" data-deleted="0"  data-toggle="tooltip"
                  data-placement="top" title="Delete" data-memberid="{{$member->id}}">
                  <img class="" id="payDeleteImg{{$payment->id}}" src="/images/delete.svg">
                  {{-- <img class="" id="undoPayDeleteImg{{$payment->id}}" src="/images/restore.svg"> --}}
                  <img class="memLoadingImg" id="payLoadingImg{{$payment->id}}" src="/images/hourglass.svg">
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="enter-pay-box bg-primary">
      <p class="pay-notice">Payments only reflect after reloading the page</p>
      <div class="form-group pay-group">
        <label for="created_at">Date: </label><br>
        <input class="softborder" type="date" name="pay_date" required>
      </div>

      <div class="form-group pay-group">
        <label for="membership_no">Amount: </label><br>
        <input class="softborder" type="number" name="amount" step=".01" required>
      </div>

      <div class="form-group pay-group">
        <label for="membership_no">Notes: </label><br>
        <input class="softborder" type="text" maxlength="250" name="notes">
      </div>

      <button type="button" class="btn pay-btn" id="pay-btn{{$member->id}}" onclick="acceptPayment({{$member->id}})">Accept</button>
    </div>
  </form>
</div>
<div></div>
</div>

