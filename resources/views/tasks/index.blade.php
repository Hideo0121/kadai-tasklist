@extends('layouts.app')

@section('content')

    <div class="flex justify-end items-center mt-8 mb-4 w-3/4 max-w-4xl mx-auto">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">新規作成</a>
    </div>

    @if($tasks->isEmpty())
        <div class="text-center text-blue-600 bg-blue-100 p-4 rounded shadow w-3/4 max-w-4xl mx-auto floating-card">
            まだタスクが登録されていません！
        </div>
    @else
        <div class="overflow-x-auto w-3/4 max-w-4xl mx-auto floating-card">
            <div class="flex justify-end mb-2 pr-4">
                <div class="mb-3 text-blue-900 font-semibold w-3/4 max-w-4xl mx-auto" style="margin-top:1.6rem;">
                    　現在 {{ $tasks->total() }} 件のタスクがあります 📝
                </div>
                <form method="GET" action="" id="perPageForm" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-700">表示件数</label>
                    <select name="per_page" id="per_page" class="border rounded px-2 py-1 min-w-[70px] mr-2" style="min-width:70px; margin-top: 0.4rem; margin-right:0.8rem;" onchange="document.getElementById('perPageForm').submit()">
                        <option value="5" @if($perPage==5) selected @endif>5</option>
                        <option value="10" @if($perPage==10) selected @endif>10</option>
                        <option value="15" @if($perPage==15) selected @endif>15</option>
                    </select>
                </form>
            </div>
            <table class="min-w-full bg-white rounded shadow">
                <colgroup>
                    <col style="width:54%">
                    <col style="width:26%">
                    <col style="width:20%">
                </colgroup>
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2 px-6">内容</th>
                        <th class="py-2 px-6">状態</th>
                        <th class="py-2 px-4 w-40">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b">
                            <td class="py-2 px-6 text-left">{{ \Illuminate\Support\Str::limit($task->content, 50) }}</td>
                            <td class="py-2 px-6 text-center">{{ $task->status }}</td>
                            <td class="py-2 px-4 w-40 flex gap-2 justify-center">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">修正</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" data-content="{{ $task->content }}" data-status="{{ $task->status }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm" onclick="event.preventDefault(); showDeleteModal(this);">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex justify-center">{{ $tasks->links() }}</div>
        </div>
    @endif

    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded shadow w-80">
            <div class="bg-blue-100 p-3 rounded-t">
                <h2 id="modalTitle" class="text-lg font-bold text-gray-800" style="padding-left: 0.5rem;">タイトル</h2>
            </div>
            <div class="p-6">
                <p id="modalMessage" class="text-gray-800 mb-4">確認メッセージ</p>
                <div class="flex justify-end gap-2">
                    <button id="modalCancel" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">キャンセル</button>
                    <button id="modalConfirm" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">確認</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    class MessageBox {
        constructor(modalId) {
            this.modal = document.getElementById(modalId);
            this.title = this.modal.querySelector('#modalTitle');
            this.message = this.modal.querySelector('#modalMessage');
            this.cancelButton = this.modal.querySelector('#modalCancel');
            this.confirmButton = this.modal.querySelector('#modalConfirm');
        }

        show(title, message, onConfirm, fontSize = '16px') {
            this.title.textContent = title;
            this.message.innerHTML = message;
            this.message.style.fontSize = fontSize;
            this.modal.classList.remove('hidden');
            this.modal.classList.add('flex');

            this.cancelButton.addEventListener('click', () => this.hide());
            this.confirmButton.addEventListener('click', () => {
                this.hide();
                onConfirm();
            });
        }

        hide() {
            this.modal.classList.add('hidden');
            this.modal.classList.remove('flex');
        }
    }

    const messageBox = new MessageBox('modal');

    function showDeleteModal(button) {
        const content = button.closest('form').dataset.content;
        const status = button.closest('form').dataset.status;

        messageBox.show(
            '確認',
            `本当に削除しますか？<br>内容: ${content}<br>状態: ${status}`,
            () => {
                button.closest('form').submit();
            },
            '14px'
        );
    }
    </script>
@endsection
