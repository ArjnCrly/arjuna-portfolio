<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;

class MessageController
{
    public function index()
    {
        $messages = ContactMessage::orderBy('id', 'DESC')->get();
        return view('admin.messages.index', [
            'messages' => $messages,
        ]);
    }

    public function toggleRead($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->update([
            'is_read' => $msg->is_read ? 0 : 1,
        ]);
        return redirect('/admin/messages')->with('success', 'Status baca pesan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();
        return redirect('/admin/messages')->with('success', 'Pesan berhasil dihapus.');
    }
}
