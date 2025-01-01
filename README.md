# AWS SQS Integration with Laravel

This Laravel project integrates AWS Simple Queue Service (SQS) for handling asynchronous message queues. This document provides the setup instructions and usage guide.

## Requirements

- PHP 8.2 or later
- Laravel 11.23 (or compatible version)
- AWS account with SQS service enabled
- AWS Access Key and Secret Key

## Installation

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd <project-folder>

2. **Install dependencies**:
    ```bash
    composer install
2. **copy .env.example to .env**:
    ```bash
    copy .env.example .env
2. **Install dependencies**:
    ```bash
    composer install
    php artisan key:generate
3. **Set up environment variables**:
    Update the .env file with your AWS credentials and SQS configurations:
    ```bash
    AWS_ACCESS_KEY_ID=<your-aws-access-key>
    AWS_SECRET_ACCESS_KEY=<your-aws-secret-key>
    AWS_DEFAULT_REGION=<your-region> # e.g., us-east-1
    AWS_USE_PATH_STYLE_ENDPOINT=<true/false> # Use true for local development like LocalStack
    AWS_SQS_QUEUE_URL=<your-sqs-queue-url>
    AWS_SQS_PREFIX=<your-sqs-prefix>
    SQS_QUEUE=<queue-name>
4. **Configure Laravel queue driver**:
    Ensure the QUEUE_CONNECTION in your .env file is set to sqs
    ```bash
    QUEUE_CONNECTION=sqs
5. **Run database migrations**:
    ```bash
    php artisan migrate
6. **Start the queue worker**:
    ```bash
    php artisan queue:work