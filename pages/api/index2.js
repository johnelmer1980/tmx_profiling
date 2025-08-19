export default function handler(req, res) {
  if (req.method === "POST") {
    const { org_id, hostname, policy } = req.body;
    // Do whatever your PHP did here
    res.json({ org_id, hostname, policy });
  } else {
    res.status(405).end(); // Method Not Allowed
  }
}