# Typesense Search for Korean


https://hub.docker.com/r/typesense/typesense
```bash
export TYPESENSE_API_KEY=xyz

mkdir $(pwd)/typesense-data

docker run -p 8108:8108 -v$(pwd)/typesense-data:/data typesense/typesense:28.0 \
  --data-dir /data --api-key=$TYPESENSE_API_KEY --enable-cors
```

