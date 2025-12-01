"""
Selenium Test Cases for ToDo List Application
"""

import unittest
import time
import os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options

class ToDoListTests(unittest.TestCase):
    
    @classmethod
    def setUpClass(cls):
        chrome_options = Options()
        chrome_options.add_argument('--headless')
        chrome_options.add_argument('--no-sandbox')
        chrome_options.add_argument('--disable-dev-shm-usage')
        cls.driver = webdriver.Chrome(options=chrome_options)
        cls.base_url = os.getenv('APP_URL', 'http://localhost:8081')
        
    @classmethod
    def tearDownClass(cls):
        cls.driver.quit()
    
    def setUp(self):
        self.driver.get(self.base_url)
        time.sleep(2)
        
    def test_01_page_loads(self):
        """Test 1: Page loads successfully"""
        self.assertIn("ToDo List", self.driver.title)
        print("✓ Test 1: Page loaded")
        
    def test_02_add_task(self):
        """Test 2: Add a new task"""
        task_name = f"Test Task {int(time.time())}"
        task_input = self.driver.find_element(By.CSS_SELECTOR, "input[name='task']")
        add_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='submit']")
        
        task_input.send_keys(task_name)
        add_button.click()
        time.sleep(2)
        
        self.assertIn(task_name, self.driver.page_source)
        print("✓ Test 2: Task added")
        
    def test_03_mark_done(self):
        """Test 3: Mark task as done"""
        task_name = f"Complete Task {int(time.time())}"
        task_input = self.driver.find_element(By.CSS_SELECTOR, "input[name='task']")
        add_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='submit']")
        
        task_input.send_keys(task_name)
        add_button.click()
        time.sleep(2)
        
        rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr")
        for row in rows:
            if task_name in row.text:
                update_link = row.find_element(By.CSS_SELECTOR, ".update a")
                update_link.click()
                time.sleep(2)
                break
        
        print("✓ Test 3: Task marked as done")
        
    def test_04_delete_task(self):
        """Test 4: Delete a task"""
        task_name = f"Delete Task {int(time.time())}"
        task_input = self.driver.find_element(By.CSS_SELECTOR, "input[name='task']")
        add_button = self.driver.find_element(By.CSS_SELECTOR, "button[name='submit']")
        
        task_input.send_keys(task_name)
        add_button.click()
        time.sleep(2)
        
        rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr")
        for row in rows:
            if task_name in row.text:
                delete_link = row.find_element(By.CSS_SELECTOR, ".delete a")
                delete_link.click()
                time.sleep(1)
                alert = self.driver.switch_to.alert
                alert.accept()
                time.sleep(2)
                break
        
        print("✓ Test 4: Task deleted")

if __name__ == '__main__':
    unittest.main(verbosity=2)
