pipeline {
    agent {
        kubernetes {
            yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
  - name: tools
    image: alpine/helm:latest # Image qui contient Helm et kubectl
    command:
    - cat
    tty: true
  - name: docker
    image: docker:latest # Image pour builder tes images Laravel
    command:
    - cat
    tty: true
    volumeMounts:
    - mountPath: /var/run/docker.sock
      name: docker-sock
  volumes:
  - name: docker-sock
    hostPath:
      path: /var/run/docker.sock
'''
        }
    }

    stages {
        stage('Build Image Auth') {
            steps {
                container('docker') {
                    // On build directement via le socket Docker de ton PC
                    sh 'docker build -t eco-auth:latest ./services/auth'
                }
            }
        }

        stage('Update K8s via Helm') {
            steps {
                container('tools') {
                    // Ici on utilise Helm qui est déjà dans le container 'tools'
                    sh 'helm upgrade --install eco-system ./eco-och'
                }
            }
        }
    }
}
