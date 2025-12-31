use athena;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'manager', 'member') NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS projects(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    start_date DATE ,
    end_date DATE,
    active ENUM ('planned','inprogress','done') DEFAULT 'planned',
    manager_id INT NOT NULL,
    Foreign Key (manager_id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS sprints(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    project_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    Foreign Key (project_id) REFERENCES projects(id) on DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    sprint_id INT NOT NULL ,
    title VARCHAR(150),
    description TEXT ,
    status ENUM('todo', 'inprogress', 'done') DEFAULT 'todo',
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    assigned_to INT,
    created_by INT NOT NULL,
    created_at DATETIME,
     FOREIGN KEY (sprint_id) REFERENCES sprints(id)
        ON DELETE CASCADE,
    FOREIGN KEY (assigned_to) REFERENCES users(id)
        ON DELETE SET NULL,
    FOREIGN KEY (created_by) REFERENCES users(id)
        ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    user_id INT ,
    content TEXT,
    created_at DATE,
    FOREIGN KEY (task_id) REFERENCES tasks(id)ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS user_tasks (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    user_id INT ,
    task_id INT,
    Foreign Key (user_id) REFERENCES users(id),
    Foreign Key (task_id) REFERENCES tasks(id)
);
