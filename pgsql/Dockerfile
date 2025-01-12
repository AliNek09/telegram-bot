FROM postgres:16-alpine

# Copy the configuration files
COPY ./data/postgresql.conf /etc/postgresql/postgresql.conf
COPY ./data/pg_hba.conf /etc/postgresql/pg_hba.conf

# Create the log directory if it doesn't exist and adjust ownership/permissions
RUN mkdir -p /var/log/postgresql && \
    chmod -R 0700 /var/log/postgresql && \
    chown -R postgres:postgres /var/lib/postgresql/data /var/log/postgresql /etc/postgresql




# Set the command to run PostgreSQL with the custom config and hba files
CMD ["postgres", "-c", "config_file=/etc/postgresql/postgresql.conf", "-c", "hba_file=/etc/postgresql/pg_hba.conf"]


