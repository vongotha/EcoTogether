pipeline {
    agent {
        kubernetes {
            yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
  - name: build-tools
    image: alpine/helm:latest # On utilise une image standard qui a helm/kubectl
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
        stage('Build Image') {
            steps {
                container('build-tools') {
                    // On build l'image
                    sh 'docker build -t eco-auth:latest ./services/auth-service'
                }
            }
        }
        stage('Deploy & Force Restart') {
            steps {
                container('build-tools') {
                    // 1. Applique les changements Helm (Config, Secrets, etc.)
                    sh 'helm upgrade --install eco-system ./eco-och'
                    
                    // 2. FORCE le redémarrage des pods pour qu'ils tirent la nouvelle image 'latest'
                    // On cible spécifiquement le déploiement de l'auth-service
                    sh 'kubectl rollout restart deployment auth-service'
                    
                    // 3. Attendre que le déploiement soit prêt pour être sûr
                    sh 'kubectl rollout status deployment auth-service'
                }
            }
        }
    }
}