pipeline {
 agent any
 stages {
        stage("Build") {
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
                sh 'php artisan passport:keys'
            }
        }
        stage("Unit test") {
            steps {
                sh 'php artisan test'
            }
        }
  }
}