# ToDo List - Jenkins CI/CD Assignment

PHP ToDo List application with Jenkins CI/CD pipeline, Docker deployment, and automated testing.

## Features

- Add, edit, delete tasks
- Docker containerization
- Jenkins CI/CD pipeline
- PHPUnit unit tests
- Selenium UI tests (4 tests)

## Quick Start

```bash
docker-compose up -d --build
# Access: http://localhost:8080
docker-compose down
```

## Jenkins Setup

### 1. Install Jenkins on EC2
```bash
sudo apt update
sudo apt install openjdk-17-jdk -y
curl -fsSL https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key | sudo tee /usr/share/keyrings/jenkins-keyring.asc
echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] https://pkg.jenkins.io/debian-stable binary/ | sudo tee /etc/apt/sources.list.d/jenkins.list
sudo apt update
sudo apt install jenkins -y
sudo systemctl start jenkins
```

### 2. Install Docker
```bash
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh
sudo usermod -aG docker jenkins
sudo systemctl restart jenkins
```

### 3. Create Pipeline Job
- New Item → Pipeline
- SCM: Git
- Repository: Your GitHub repo URL
- Script Path: `Jenkinsfile`

### 4. GitHub Webhook
- Repo Settings → Webhooks → Add webhook
- URL: `http://<jenkins-ip>:8080/github-webhook/`
- Content: `application/json`
- Events: Push events

## Pipeline Stages

1. **Code Linting** - PHP syntax validation
2. **Code Build** - Docker image build
3. **Unit Testing** - PHPUnit tests (3 tests)
4. **Containerized Deployment** - Docker Compose deployment
5. **Selenium Testing** - UI tests (4 tests)

## Files

- `Jenkinsfile` - CI/CD pipeline
- `Dockerfile` - App container
- `Dockerfile.selenium` - Test container
- `docker-compose.yml` - Deployment config
- `tests/Unit/TaskManagerTest.php` - Unit tests
- `selenium-tests/test_todo.py` - Selenium tests

## License

MIT

