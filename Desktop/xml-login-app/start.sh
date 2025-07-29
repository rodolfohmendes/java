#!/bin/bash
set -e

echo "🔄 Parando containers existentes..."
docker compose down --volumes --remove-orphans || true

echo "🧹 Limpando volumes anteriores..."
docker volume prune -f
docker volume rm $(docker volume ls -q -f name=xml-login-app_db_data) 2>/dev/null || true

echo "🚀 Construindo imagens..."
docker compose build

echo "🔼 Subindo containers..."
docker compose up -d

echo "⏳ Aguardando PostgreSQL inicializar..."
sleep 8

echo "📦 Containers ativos:"
docker ps --format 'table {{.Names}}\t{{.Status}}\t{{.Ports}}'

echo "✅ Pronto! Acesse: http://localhost:8080"
