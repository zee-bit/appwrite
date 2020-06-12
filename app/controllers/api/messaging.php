<?php

global $utopia, $response, $projectDB;

use Utopia\Exception;
use Utopia\Response;

include_once __DIR__ . '/../shared/api.php';

/**
 * Open Issues:
 * 
 *  Messaging Access
 *  - Who can message users in a channel?
 *  - Who can receive messages in a channel?
 * 
 * Use Cases to Consider
 * 
 *  - Public Chat
 *  - Private Chat
 *  - Social Feed
 *  - Gaming
 *  - IOT controller
 */

/**
 * Channels:
 *  - Limit amount of users subscribed
 *  - Limit read access
 *  - Limit write access
 *  - Type (Slack, Email, Telegram, ...)
 *  - Credentials (JSON, validate per type)
 *  - Events?
 */

/**
 * Subscriptions:
 *  - ChannelID
 *  - UserID
 *  - Endpoint (email, token)
 *  - GEO
 *  - Device
 *  - OS
 *  - Key / Value
 *  - Message permissions in this scope?
 */

/**
 * Messages:
 *  - ChannelID
 *  - Type (message/event?)
 *  - Title
 *  - Body
 *  - Image (FileID)
 *  - Payload (key-value/json)
 * 
 *  Options:
 *      1. Send to all subscribers
 *          - Slack adapter can just send a single HTTP request
 *          - Email sends to all subscribers one by one (devided to chunks of n) ability to filter
 *      2. Send to a specific user / team (by userId, translated to user endpoint [if there is any])
 */

/**
 * Dashboard
 *  1. Show usage stats
 *  2. Number of total channels
 *  3. Number of total subscribers
 */

// POST /messaging/channels
// POST /messaging/channels/telegram
// POST /messaging/channels/slack
// POST /messaging/channels/email (built-in)
// POST /messaging/channels/stream (built-in)
// GET /messaging/channels
// GET /messaging/channels/:id
// PATCH /messaging/channels/:id
// DELETE /messaging/channels/:id

// POST /messaging/channels/:id/subscription
// POST /messaging/channels/:id/subscription/telegram
// POST /messaging/channels/:id/subscription/slack
// POST /messaging/channels/:id/subscription/email (built-in)
// POST /messaging/channels/:id/subscription/stream (built-in)
// GET /messaging/channels/:id/subscription
// GET /messaging/channels/:id/subscription/:id
// PATCH /messaging/channels/:id/subscription/:id
// DELETE /messaging/channels/:id/subscription/:id

// POST /messaging/channels/messages
// POST /messaging/channels/messages/telegram
// POST /messaging/channels/messages/slack
// POST /messaging/channels/messages/email (built-in)
// POST /messaging/channels/messages/stream (built-in)
// GET /messaging/channels/messages
// GET /messaging/channels/:id/messages/:id
// PATCH /messaging/channels/:id/messages:/:id
// DELETE /messaging/channels/:id/messages/:id