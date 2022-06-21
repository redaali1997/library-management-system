<x-layout>
    <div class="w-4/5 p-7">
        <a href="{{ route('books.create') }}" class="rounded bg-blue-500 py-1 px-3 text-xl font-semibold text-white">Add
            a Book</a>
        <div class="my-5 w-full rounded bg-slate-300 p-5">
            <h3 class="mb-4 bg-slate-400 text-center text-lg font-semibold">Orders</h3>
            <table class="w-full text-center">
                <thead>
                    <tr class="bg-slate-200">
                        <th>Book Title</th>
                        <th>User</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="hover:bg-slate-200">
                            <td><a href="{{ route('books.show', $order->book->id) }}">{{ $order->book->title }}</a>
                            </td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td class="flex justify-center">
                                @if ($order->status == 'borrow')
                                    <form action="{{ route('admin.accept', $order->id) }}" method="post"
                                        class="mx-1">
                                        @csrf
                                        <button class="rounded bg-blue-500 py-0.5 px-2 text-white">Accept</button>
                                    </form>
                                    <form action="{{ route('admin.refuse', $order->id) }}" method="post">
                                        @csrf
                                        <button class="rounded bg-red-500 py-0.5 px-2 text-white">Refuse</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.confirm', $order->id) }}" method="post">
                                        @csrf
                                        <button class="rounded bg-zinc-700 py-0.5 px-2 text-white">Confirm</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
