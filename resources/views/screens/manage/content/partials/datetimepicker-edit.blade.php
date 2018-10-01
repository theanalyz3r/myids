<link rel="stylesheet" href="/css/datetime/datetimepicker.css">
<script type="text/javascript" src="/js/datetime/datetimejquery.min.js"></script>
<script src="/js/datetime/datetimemoment.js"></script>
<script src="/js/datetime/bootstrap-datetimepicker.js"></script>

<!-- Date - Time - Picker -->
              <div class="form-group">
                <label for="starts_on">Start Date/Time</label>
                <div class='input-group date' id='starts_on'>
                  <input type='text' name="starts_on" class="form-control" value="{{ old('starts_on') ?? $content->starts_on->format('l jS F Y h:i A') }}"/>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>

            <script type="text/javascript">
              $(function () {
                $('#starts_on').datetimepicker({
                  format: "ddd, Do MMMM YYYY, h:mm a"
                });
              });
            </script>

            <!-- Date - Time - Picker -->
              <div class="form-group">
                <label for="expires_on">Expiry Date/Time</label>
                <div class='input-group date' id='expires_on'>
                  <input type='text' name="expires_on" class="form-control" value="{{ old('expires_on') ?? $content->expires_on->format('l jS F Y h:i A') }}" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>

            <script type="text/javascript">
              $(function () {
                $('#expires_on').datetimepicker({
                  format: "ddd, Do MMMM YYYY, h:mm a"
                });
              });
            </script>