pipeline {
    agent any
    
    stages {
        stage('Code Linting') {
            steps {
                echo 'Running PHP Linting...'
                sh '''
                    docker run --rm -v $(pwd):/app php:8.2-cli sh -c "
                        find /app -name '*.php' -not -path '*/vendor/*' -exec php -l {} \\;
                    "
                '''
            }
        }
        
        stage('Code Build') {
            steps {
                echo 'Building Docker Image...'
                sh 'docker build -t todo-app .'
            }
        }
        
        stage('Unit Testing') {
            steps {
                echo 'Running Unit Tests...'
                sh '''
                    docker run --rm -v $(pwd):/app php:8.2-cli sh -c "
                        cd /app &&
                        curl -L https://phar.phpunit.de/phpunit-10.phar -o phpunit.phar &&
                        php phpunit.phar --configuration phpunit.xml
                    "
                '''
            }
        }
        
        stage('Containerized Deployment') {
            steps {
                echo 'Deploying with Docker Compose...'
                sh 'docker compose down || true'
                sh 'docker compose up -d'
                sh 'sleep 20'
                sh 'curl -f http://localhost:8081'
            }
        }
        
        stage('Selenium Testing') {
            steps {
                echo 'Running Selenium Tests...'
                sh '''
                    cd selenium-tests
                    pip3 install -r requirements.txt
                    python3 test_todo.py
                '''
            }
        }
    }
    
    post {
        always {
            sh 'docker compose down || true'
        }
    }
}
