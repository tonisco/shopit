@if ($message = Session::get('success'))
    <x-general.utils.toast :message="$message['message']" :title="$message['title']" type="success" />
@endif
@if ($message = Session::get('error'))
    <x-general.utils.toast :message="$message['message']" :title="$message['title']" type="error" />
@endif
@if ($message = Session::get('warning'))
    <x-general.utils.toast :message="$message['message']" :title="$message['title']" type="warning" />
@endif
@if ($message = Session::get('info'))
    <x-general.utils.toast :message="$message['message']" :title="$message['title']" type="info" />
@endif
@if ($errors->any())
    <x-general.utils.toast :message="$message['message']" :title="$message['title']" type="any" />
@endif
