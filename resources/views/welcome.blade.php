<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }
        }
    </style>

    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Home</h2>

            <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">
                Add New Post
            </a>
        </div>

        @if (session('success'))
            <h2 class="text-green-600">{{ session('success')}} </h2>
        @endif

        <div class="">

            <!-- Table -->
            <div class="min-w-full">
                <div
                    class="overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
                    <table class="min-w-full divide-y divide-table-line">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                    ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                    Description</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">
                                    Image</th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-medium text-muted-foreground-1 uppercase">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">
                                        {{ $post->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{$post->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{$post->description}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground"><img src="images/{{$post->image}}" width="80" alt=></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <button type="button"
                                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg text-primary hover:text-primary-hover focus:outline-hidden focus:text-primary-focus disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                                    </td>
                                </tr>

                            @endforeach







                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table -->

        </div>

    </div>

</body>

</html>