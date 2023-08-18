
<button id="notificationButton" type="button" data-toast data-toast-text="Your application was successfully sent" data-toast-gravity="top" data-toast-position="center" data-toast-className="success" data-toast-duration="3000" class="btn btn-light w-xs">Success</button>

@push('scripts')
<script>
    function showNotification(message, color='success') {
        $('#notificationButton').attr("data-toast-text", message);
        $('#notificationButton').attr("data-toast-className", color);
        $('#notificationButton').trigger('click');
    }
</script>
@endpush