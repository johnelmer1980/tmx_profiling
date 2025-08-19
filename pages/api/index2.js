export default function handler(req, res) {
  if (req.method === "POST") {
    const { org_id, hostname, policy } = req.body;
    res.status(200).json({ org_id, hostname, policy });
  } else {
    res.status(405).end(); // Method not allowed
  }
}