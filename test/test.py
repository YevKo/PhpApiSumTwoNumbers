import unittest
import requests


class TestApi(unittest.TestCase):
    
    # Specify the url to be tested
    url = 'http://localhost/php_api_project/api.php'

    def test_sum(self):
        """
        Test that api returns correct result of addition 
        """
        # Prepare arguments
        args = {'number_one': 1, 'number_two': 1}
        # Construct request
        r = requests.get(self.url, params=args)
        # Check that api result is equal to expected
        self.assertEqual(r.text, '2')

    def test_strings(self):
        """
        Test that a string value cannot be accepted 
        """
        # Prepare arguments
        args = {'number_one': 'string', 'number_two': 1}
        # Construct request
        r = requests.get(self.url, params=args)
        # Check that api result is equal to expected
        self.assertEqual(r.status_code, 400)

    def test_post(self):
        """
        Test that POST method is not accepted
        """
        # Construct request
        r = requests.post(self.url)
        # Check that api result is equal to expected
        self.assertEqual(r.status_code, 403)

if __name__ == '__main__':
    unittest.main()
