<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->tables() as $table) {
            Schema::dropIfExists($table);
        }

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::create('wire_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('Private is 1-1 , group or channel');
            $table->timestamp('disappearing_started_at')->nullable();
            $table->integer('disappearing_duration')->nullable();
            $table->index('type');
            $table->timestamps();
        });

        Schema::create('wire_attachments', function (Blueprint $table) {
            $table->id();
            $table->morphs('attachable');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('original_name');
            $table->string('url');
            $table->string('mime_type');
            $table->timestamps();
            $table->index(['attachable_id', 'attachable_type']);
        });

        Schema::create('wire_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id')->nullable();
            $table->foreign('conversation_id')->references('id')->on('wire_conversations')->cascadeOnDelete();
            $table->unsignedBigInteger('sendable_id');
            $table->string('sendable_type');
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->foreign('reply_id')->references('id')->on('wire_messages')->nullOnDelete();
            $table->text('body')->nullable();
            $table->string('type')->default('text');
            $table->timestamp('kept_at')->nullable()->comment('filled when a message is kept from disappearing');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['conversation_id']);
            $table->index(['sendable_id', 'sendable_type']);
        });

        Schema::create('wire_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')->references('id')->on('wire_conversations')->cascadeOnDelete();
            $table->string('role');
            $table->unsignedBigInteger('participantable_id');
            $table->string('participantable_type');
            $table->timestamp('exited_at')->nullable()->index();
            $table->timestamp('last_active_at')->nullable();
            $table->timestamp('conversation_cleared_at')->nullable()->index();
            $table->timestamp('conversation_deleted_at')->nullable()->index();
            $table->timestamp('conversation_read_at')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['conversation_id', 'participantable_id', 'participantable_type'], 'conv_part_id_type_unique');
            $table->index(['role']);
        });

        Schema::create('wire_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actionable_id');
            $table->string('actionable_type');
            $table->unsignedBigInteger('actor_id');
            $table->string('actor_type');
            $table->string('type');
            $table->string('data')->nullable()->comment('Some additional information about the action');
            $table->timestamps();
            $table->index(['actionable_id', 'actionable_type']);
            $table->index(['actor_id', 'actor_type']);
            $table->index('type');
        });

        Schema::create('wire_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')->references('id')->on('wire_conversations')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('type')->default('private');
            $table->boolean('allow_members_to_send_messages')->default(true);
            $table->boolean('allow_members_to_add_others')->default(true);
            $table->boolean('allow_members_to_edit_group_info')->default(false);
            $table->boolean('admins_must_approve_new_members')->default(false)->comment('when turned on, admins must approve anyone who wants to join group');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    private function tables(): array
    {
        return [
            'wire_actions',
            'wire_attachments',
            'wire_groups',
            'wire_messages',
            'wire_participants',
            'wire_conversations',
        ];
    }
};
