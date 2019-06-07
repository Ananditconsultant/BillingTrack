<?php

namespace FI\Observers;

use FI\Modules\MailQueue\Support\MailQueue;
use FI\Modules\Notes\Models\Note;

class NoteObserver
{
    public function __construct(MailQueue $mailQueue)
    {
        $this->mailQueue = $mailQueue;
    }
    /**
     * Handle the note "created" event.
     *
     * @param  \FI\Modules\Notes\Models\Note  $note
     * @return void
     */
    public function created(Note $note): void
    {
        if (auth()->user()->client_id) {
            $mail = $this->mailQueue->create($note->notable, [
                'to'         => [$note->notable->user->email],
                'cc'         => [config('fi.mailDefaultCc')],
                'bcc'        => [config('fi.mailDefaultBcc')],
                'subject'    => trans('fi.note_notification'),
                'body'       => $note->formatted_note,
                'attach_pdf' => config('fi.attachPdf'),
            ]);

            $this->mailQueue->send($mail->id);
        }
    }
}
