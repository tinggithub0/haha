@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            {{--清單--}}
            <div class="card card-default mb-4">
                <div class="card-body">
                    <p class="card-title text-2xl">TodoList</p>
                    <table class="table table-striped task-table mb-0">
                        <thead class="font-black text-lg">
                            <tr>
                                <td>事項</td>
                                <td>時間</td>
                                <td class="text-md-right text-sm-right">選項</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ $todo->body }}</td>
                                <td>{{ $todo->deadline }}</td>
                                <td class="text-md-right text-sm-right">
                                    <div class="inline-flex">
                                        <div class="mr-1">
                                            <form action="/todolist/{{ $todo->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success">完成</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="/todolist/{{ $todo->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">X</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--新增--}}
            <form action="{{ route('todolist') }}" method="post">
                @csrf
                <div class="mb-1">
                    <textarea name="body" id="body" cols="30" rows="2" class="bg-gray-100 border-2 w-4/6 p-2
                        rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="在這裡輸入代辦事項，點下面的新增按鈕存檔!"></textarea>

                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <input name="deadline" id="deadline" class="date bg-gray-100 border-2 rounded-lg w-80 p-1"
                           type="text" placeholder="選擇日期">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 font-medium
                        rounded">新增</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
