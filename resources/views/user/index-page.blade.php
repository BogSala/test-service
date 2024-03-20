<x-base>
    <h1>Users</h1>
{{--    @dump($lastPage)--}}
    <x-users.create-link></x-users.create-link>
    <hr>
    <x-users.page :users="$users"></x-users.page>
    <x-users.page-change :page="$page" :lastPage="$lastPage"></x-users.page-change>
</x-base>
