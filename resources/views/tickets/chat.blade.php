<link rel="stylesheet" href="{{ asset('public/css/twiliochat.css') }}">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="row"><div id="logo-column" class="col-md-2 col-md-offset-5">
            <img id="logo-image" src="{{ asset('public/images/twilio-logo.png') }}"/>
          </div></div>
          <div id="status-row" class="row disconnected">
            <div class="col-md-5 left-align">
              <span id="delete-channel-span"><b>Delete current channel</b></span>
            </div>
            <div class="col-md-7 right-align">
              <span id="status-span">Connected as <b><span id="username-span"></span></b></span>
              <span id="leave-span"><b>x Leave</b></span>
            </div>
          </div>
        </div>
      </div>
      <div id="container" class="row">
        <div id="channel-panel" class="col-md-offset-2 col-md-2">
          <div id="channel-list" class="row not-showing"></div>
          <div id="new-channel-input-row" class="row not-showing">
            <textarea placeholder="Type channel name" id="new-channel-input" rows="1" maxlength="20" class="channel-element"></textarea>
          </div>
          <div class="row">
            <img id="add-channel-image" src="{{ asset('public/images/add-channel-image.png') }}"/>
          </div>
        </div>
        <div id="chat-window" class="col-md-4 with-shadow">
          <div id="message-list" class="row disconnected"></div>
          <div id="typing-row" class="row disconnected">
            <p id="typing-placeholder"></p>
          </div>
          <div id="input-div" class="row">
            <textarea id="input-text" disabled="true" placeholder="   Your message"></textarea>
          </div>
          <div id="connect-panel" class="disconnected row with-shadow">
            <div class="row">
              <div class="col-md-12">
                <label for="username-input">Username: </label>
                <input id="username-input" type="text" placeholder="username"/>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <img id="connect-image" src="{{ asset('public/images/connect-image.png') }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- HTML Templates -->
    <script type="text/html" id="message-template">
      <div class="row no-margin">
        <div class="row no-margin message-info-row" style="">
          <div class="col-md-8 left-align"><p data-content="username" class="message-username"></p></div>
          <div class="col-md-4 right-align"><span data-content="date" class="message-date"></span></div>
        </div>
        <div class="row no-margin message-content-row">
          <div style="" class="col-md-12"><p data-content="body" class="message-body"></p></div>
        </div>
      </div>
    </script>
    <script type="text/html" id="channel-template">
      <div class="col-md-12">
        <p class="channel-element" data-content="channelName"></p>
      </div>
    </script>
    <script type="text/html" id="member-notification-template">
      <p class="member-status" data-content="status"></p>
    </script>
    <!-- JavaScript -->
	<script src="{{URL::asset('public/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('public/js/jquery-throttle.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/jquery.loadTemplate-1.4.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js"></script>
    <!-- Twilio Common helpers and Twilio Chat JavaScript libs from CDN. -->
    <script src="https://media.twiliocdn.com/sdk/js/common/releases/0.1.5/twilio-common.js"></script>
    <script src="https://media.twiliocdn.com/sdk/js/chat/releases/0.11.1/twilio-chat.js"></script>
    <script src="{{ URL::asset('public/js/twiliochat.js') }}"></script>
    <script src="{{ URL::asset('public/js/dateformatter.js') }}"></script>