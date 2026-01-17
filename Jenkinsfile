pipeline {
    agent {
        kubernetes {
            yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
  - name: build-tools
    image: mes-outils:local  # Utilise votre image combinée
    imagePullPolicy: IfNotPresent
    command: ["cat"]
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
        stage('Build & Deploy') {
            steps {
                container('build-tools') {
                    sh 'docker build -t eco-auth:latest ./services/auth-service'
                    sh 'helm upgrade --install eco-system ./eco-och'
                }
            }
        }
    }
}
